import { NavLink } from "react-router-dom";

export default function Sidebar() {
  const links = [
    { name: "Dashboard", path: "/admin" },
    { name: "Categories", path: "/admin/categories" },
    { name: "Products", path: "/admin/products" },
    { name: "Users", path: "/admin/users" },
    { name: "Orders", path: "/admin/orders" },
  ];

  return (
    <aside className="w-64 bg-gray-900 text-white h-screen sticky top-0 hidden md:block">
      <div className="p-4 font-bold text-lg border-b border-gray-700">Admin Panel</div>
      <nav className="mt-4 flex flex-col">
        {links.map((link) => (
          <NavLink
            key={link.name}
            to={link.path}
            className={({ isActive }) =>
              `px-4 py-2 text-sm hover:bg-gray-700 ${isActive ? "bg-gray-700" : ""}`
            }
          >
            {link.name}
          </NavLink>
        ))}
      </nav>
    </aside>
  );
}
