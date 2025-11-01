import { useEffect, useState } from "react";
import axios from "axios";

export default function Categories() {
  const [categories, setCategories] = useState([]);
  const [name, setName] = useState("");
  const [is_popular, setIs_popular] = useState(null);
  const [editingId, setEditingId] = useState(null)
  const [loading, setLoading] = useState(false);
  const [errors, setErrors] = useState(null)

    useEffect(() => {
    fetchCategories();
  }, []);
  // helper fetch categories from API
  async function fetchCategories(){
    setLoading(true);
    try{
        const res = await axios.get("/api/admin/categories");
        // console.log(res.data);
        setCategories(res.data);
    } catch (err){
        console.error("Failed to fetch categories" .err);
    } finally {
        setLoading(false);
    }

  }


  const addCategory = async (e) => {
    e.preventDefault();
    const formData = new FormData();
    formData.append("name", name);
    // if (image) formData.append("image", image);
    formData.append("is_popular", is_popular);

    await axios.post("/api/admin/categories", formData, {
      headers: { "Content-Type": "multipart/form-data" },
    });
    fetchCategories();
    setName("");
    // setImage(null);
    setIs_popular(false);
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
        <input
          type="checkbox"
          className="border px-3 py-1 rounded"
          checked={!!is_popular}
          onChange={(e) => setIs_popular(e.target.value)}
        />
        <button className="bg-blue-600 text-white px-4 rounded">Add</button>
      </form>

      <ul className="bg-white rounded shadow p-4">
        {loading ? (
          <li className="py-2 text-gray-500 text-center">Loading categories...</li>
        ) : categories && categories.length > 0 ? (
          categories.map((c) => (
            <li key={c.id} className="border-b py-2 last:border-none">
              {c.name}
            </li>
          ))
        ) : (<li className="py-2 text-gray-500 text-center">No categories found</li>)}
      </ul>
    </div>
  );
}
