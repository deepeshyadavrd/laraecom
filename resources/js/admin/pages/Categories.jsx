import { useEffect, useState } from "react";

export default function Categories() {
  const [categories, setCategories] = useState([]);
  const [name, setName] = useState("");

  useEffect(() => {
    fetch("/api/admin/categories")
      .then((res) => res.json())
      .then(setCategories);
  }, []);

  const addCategory = (e) => {
    e.preventDefault();
    fetch("/api/admin/categories", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ name }),
    }).then(() => {
      setName("");
      fetch("/api/admin/categories")
        .then((res) => res.json())
        .then(setCategories);
    });
  };

  return (
    <div>
      <h2 className="text-xl font-bold mb-4">Categories</h2>
      <form onSubmit={addCategory} className="flex gap-2 mb-6">
        <input
          type="text"
          placeholder="New category"
          className="border px-3 py-1 rounded"
          value={name}
          onChange={(e) => setName(e.target.value)}
        />
        <button className="bg-blue-600 text-white px-4 rounded">Add</button>
      </form>

      <ul className="bg-white rounded shadow p-4">
        {categories.map((c) => (
          <li key={c.id} className="border-b py-2 last:border-none">
            {c.name}
          </li>
        ))}
      </ul>
    </div>
  );
}
