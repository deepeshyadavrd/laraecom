import './mobile-menu'; // Add this line
import './bootstrap';
import React from 'react'
import ReactDOM from 'react-dom/client'

function App() {
  return <h1 className="text-3xl font-bold text-center mt-10">Hello from React + Laravel 🎉</h1>;
}

ReactDOM.createRoot(document.getElementById('app')).render(<App />);