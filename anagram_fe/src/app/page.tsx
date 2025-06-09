"use client"
import Image from "next/image";
import styles from "./page.module.css";
import {WordService} from "@/services/WordService";
import {useEffect, useState} from "react";
import {IWords} from "@/types/domain/IWords";

export default function Home() {
    const wordService = new WordService();
    const [words, setWords] = useState<IWords | null>(null);
    const [searchQuery, setSearchQuery] = useState("");
    const [loading, setLoading] = useState(false);

    useEffect(() => {
            const fetchData = async () => {
                if (searchQuery.length < 3) {
                    setWords(null);
                    return;
                }
                setLoading(true);
                try {

                const response = await wordService.getAllAsyncModified(searchQuery);
                    if (response.errors) {
                        console.error(response.errors);
                        setWords(null);
                    }
                    setWords(response.data!);
                } catch (error) {
                    console.error("Error fetching words:", error);
                    setWords(null);
                } finally {
                    setLoading(false);
                }
            }
            fetchData();
    }, [searchQuery]);
  return (
      <div className="container py-5">
          <h2 className="mb-4">Anagram Finder</h2>
          <input
              type="text"
              className="form-control mb-3"
              placeholder="Search a word (min 3 letters)..."
              value={searchQuery}
              onChange={(e) => setSearchQuery(e.target.value)}
          />

          {loading && <p>Loading...</p>}

          {words && (
              <div className="mt-4">
                  <h5>{words.anagrams.length} word{words.anagrams.length !== 1 ? "s" : ""} found</h5>
                  <table className="table table-bordered mt-2">
                      <thead>
                      <tr>
                          <th>#</th>
                          <th>Word</th>
                      </tr>
                      </thead>
                      <tbody>
                      {words.anagrams.map((word, index) => (
                          <tr key={index}>
                              <td>{index + 1}</td>
                              <td>{word}</td>
                          </tr>
                      ))}
                      </tbody>
                  </table>
              </div>
          )}

          {!loading && words?.anagrams.length === 0 && (
              <p className="text-muted">No results found.</p>
          )}
      </div>
  );
}
