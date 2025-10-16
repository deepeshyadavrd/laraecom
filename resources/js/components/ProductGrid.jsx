import { useEffect, useState } from "react";

export default function ProductGrid() {
  const [products, setProducts] = useState([]);

  useEffect(() => {
    fetch("/api/products")
      .then(res => res.json())
      .then(setProducts);
  }, []);

  return (
    <div className="grid grid-cols-3 gap-4">
      {products.map(p => (
        <div key={p.id} className="border p-4 rounded">
          <h2 className="font-bold">{p.name}</h2>
          <p>₹{p.price}</p>
        </div>
      ))}
    </div>
  );
}