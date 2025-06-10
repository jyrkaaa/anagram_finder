"use client";

import { useState } from "react";
import { ImportService } from "@/services/ImportService";
import { IWordsInput } from "@/types/domain/IWordsInput";
import {DeleteService} from "@/services/DeleteService";
import {ImportBEService} from "@/services/ImportBEService";
import {IUrlInput} from "@/types/domain/IUrlInput";

export default function WordInput() {
    const importService = new ImportService();
    const fullBEService = new ImportBEService();
    const deleteService = new DeleteService();

    const [url, setUrl] = useState("");
    const [backendUrl, setBackendUrl] = useState("");
    const [status, setStatus] = useState<string[]>([]);
    const [loading, setLoading] = useState(false);
    const [progress, setProgress] = useState(0);

    const BATCH_SIZE = 8000;

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();
        setStatus([]);
        setLoading(true);
        setProgress(0);

        try {
            const response = await fetch("https://corsproxy.io/?" + url); // to bypass CORS
            if (!response.ok) throw new Error(`Failed to fetch URL: ${response.statusText}`);

            const text = await response.text();
            const allWords = text
                .split(/\r?\n/)
                .map(line => line.trim())
                .filter(line => line.length > 0 && !/^\d+$/.test(line)); // remove empty/numeric-only lines

            const batches: IWordsInput[] = [];
            for (let i = 0; i < allWords.length; i += BATCH_SIZE) {
                const batch = allWords.slice(i, i + BATCH_SIZE);
                batches.push({ words: batch });
            }

            for (let i = 0; i < batches.length; i++) {
                setStatus(prev => [...prev, `Sending batch ${i + 1} of ${batches.length}...`]);

                const result = await importService.addAsyncModified(batches[i]);

                if (result.errors) {
                    setStatus(prev => [...prev, `Batch ${i + 1} failed: ${result.errors!.join(", ")}`]);
                } else {
                    setStatus(prev => [...prev, `Batch ${i + 1} succeeded, ${result.data?.message}.`]);
                }

                const newProgress = Math.round(((i + 1) / batches.length) * 100);
                setProgress(newProgress);
            }

            setStatus(prev => [...prev, "All batches completed."]);
        } catch (error: any) {
            setStatus([`Error: ${error.message}`]);
        } finally {
            setLoading(false);
        }
    };

    const handleBackendSubmit = async () => {
        setStatus(["For fully implementing by backend..."]);
        setLoading(true);
        setProgress(0);

        try {
            const input: IUrlInput = { url: backendUrl };
            await deleteService.deleteAsyncModified();
            const result = await fullBEService.addAsyncBE(input);

            if (result.errors) {
                setStatus(prev => [...prev, `Backend import failed: ${result.errors!.join(", ")}`]);
            } else {
                setStatus(prev => [...prev, `Backend import done.`]);
            }
        } catch (error: any) {
            setStatus([`Error: ${error.message}`]);
        } finally {
            setLoading(false);
        }
    };
    const handleDelete = async () => {
        setLoading(true);
        setStatus(["Deleting all words..."]);
        setProgress(0);

        try {
            const result = await deleteService.deleteAsyncModified();
            console.log(result);
            if (result.errors) {
                setStatus([`Error: ${result.errors}`]);
            } else {
                setStatus([result.data?.message || "All words deleted successfully."]);
            }
        } catch (error: any) {
            setStatus([`Error: ${error.message}`]);
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="container py-5">
            <h2 className="mb-4">Import Words from URL</h2>

            <form onSubmit={handleSubmit} className="mb-4">
                <input
                    type="url"
                    className="form-control mb-2"
                    placeholder="Enter .txt file URL (one word per line)"
                    value={url}
                    onChange={(e) => setUrl(e.target.value)}
                    required
                />
                <div className="d-flex gap-2">
                    <button type="submit" className="btn btn-primary" disabled={loading}>
                        {loading ? "Importing..." : "Start Import"}
                    </button>
                    <button
                        type="button"
                        className="btn btn-danger"
                        onClick={handleDelete}
                        disabled={loading}
                    >
                        {loading ? "Working..." : "Delete All Words"}
                    </button>
                </div>
            </form>

            <h4 className="mt-5">Backend-Handled Import</h4>
            <div className="mb-3">
                <input
                    type="url"
                    className="form-control mb-2"
                    placeholder="Enter .txt file URL (backend import)"
                    value={backendUrl}
                    onChange={(e) => setBackendUrl(e.target.value)}
                    required
                />
                <button
                    type="button"
                    className="btn btn-secondary"
                    onClick={handleBackendSubmit}
                    disabled={loading}
                >
                    {loading ? "Importing via Backend..." : "Start Backend Import"}
                </button>
            </div>

            {loading && (
                <div className="mb-3">
                    <div className="progress">
                        <div
                            className="progress-bar progress-bar-striped progress-bar-animated"
                            role="progressbar"
                            style={{ width: `${progress}%` }}
                            aria-valuenow={progress}
                            aria-valuemin={0}
                            aria-valuemax={100}
                        >
                            {progress}%
                        </div>
                    </div>
                </div>
            )}

            <div>
                {status.map((msg, idx) => (
                    <p key={idx} className="small">{msg}</p>
                ))}
            </div>
        </div>
    );
}
