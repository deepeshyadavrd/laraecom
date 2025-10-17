import { useState } from "react";
import SearchBar from "./SearchBar";

const categories = ["Sofas", "Beds", "Tables", "Chairs", "Wardrobes"];

export default function Navbar() {
  const [menuOpen, setMenuOpen] = useState(false);

  return (
    <header className="shadow-md bg-white sticky top-0 z-50">
      <div className="flex items-center justify-between px-4 sm:px-6 py-3">
        {/* Brand */}
        <h1 className="text-xl sm:text-2xl font-bold text-blue-700">
          UrbanWood
        </h1>

        {/* Search (hidden on very small screens) */}
        <div className="hidden md:block">
          <SearchBar />
        </div>

        {/* Desktop Buttons */}
        <div className="hidden md:flex items-center gap-4">
          <button className="text-gray-700 hover:text-blue-600">Login</button>
          <button className="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
            Sign Up
          </button>
        </div>

        {/* Mobile Menu Button */}
        <button
          className="md:hidden p-2 rounded hover:bg-gray-100"
          onClick={() => setMenuOpen(!menuOpen)}
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            strokeWidth={2}
            stroke="currentColor"
            className="w-6 h-6"
          >
            <path
              strokeLinecap="round"
              strokeLinejoin="round"
              d={
                menuOpen
                  ? "M6 18L18 6M6 6l12 12" // X icon
                  : "M4 6h16M4 12h16M4 18h16" // menu icon
              }
            />
          </svg>
        </button>
      </div>

      {/* Mobile dropdown */}
      {menuOpen && (
        <div className="md:hidden absolute inset-x-0 border-t bg-gray-50 p-4 space-y-3">
          <SearchBar />
          <div className="flex flex-col gap-3">
            {categories.map((cat) => (
              <a
                key={cat}
                href="#"
                className="text-gray-700 font-medium hover:text-blue-600"
              >
                {cat}
              </a>
            ))}
            <div className="flex gap-4 mt-2">
              <button className="text-gray-700 hover:text-blue-600">
                Login
              </button>
              <button className="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                Sign Up
              </button>
            </div>
          </div>
        </div>
      )}

      {/* Desktop Nav */}
      <nav className="hidden md:flex justify-center gap-6 bg-gray-50 py-2 text-sm font-medium">
        {categories.map((cat) => (
          <a key={cat} href="#" className="hover:text-blue-600">
            {cat}
          </a>
        ))}
      </nav>
    </header>
  );
}
