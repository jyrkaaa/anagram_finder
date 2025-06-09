"use client";
import Link from "next/link";
import { useRouter } from "next/navigation";
import { useContext } from "react";

export default function Header() {
    const router = useRouter();

    return (
        <>
            <nav className="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
                <div className="container">
                    <Link className="navbar-brand" href="/">Anagrams</Link>
                    <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon"></span>
                    </button>
                    <div className="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                        <ul className="navbar-nav flex-grow-1">
                            <li className="nav-item">
                                <Link className="nav-link text-dark" href="/wordImport">Add Wordbase</Link>
                            </li>


                        </ul>
                        <ul className="navbar-nav">
                            <li className="nav-item">
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


        </>
    );
}
