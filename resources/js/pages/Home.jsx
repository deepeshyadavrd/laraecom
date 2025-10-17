import React, { useState, useEffect } from 'react';
// import { productService } from '../services/productService';

const Home = ({ onNavigate }) => {
    const [featuredProducts, setFeaturedProducts] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        fetchFeaturedProducts();
    }, []);

    const fetchFeaturedProducts = async () => {
        try {
            const response = await productService.getAllProducts({ per_page: 4 });
            if (response.success) {
                setFeaturedProducts(response.data);
            }
        } catch (error) {
            console.error('Error fetching featured products:', error);
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="min-h-screen bg-gray-50">
            {/* Hero Section */}
            <section className="bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-700 text-white">
                <div className="container mx-auto px-4 py-20">
                    <div className="max-w-4xl mx-auto text-center">
                        <h1 className="text-5xl md:text-6xl font-bold mb-6 animate-fade-in">
                            Welcome to Our Store
                        </h1>
                        <p className="text-xl md:text-2xl mb-8 text-gray-100">
                            Discover amazing products at unbeatable prices
                        </p>
                        <div className="flex flex-wrap justify-center gap-4">
                            <button
                                onClick={() => onNavigate('products')}
                                className="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold text-lg hover:bg-gray-100 transition-all transform hover:scale-105 shadow-lg"
                            >
                                Shop Now
                            </button>
                            <button
                                className="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-semibold text-lg hover:bg-white hover:text-blue-600 transition-all transform hover:scale-105"
                            >
                                Learn More
                            </button>
                        </div>
                    </div>
                </div>

                {/* Wave SVG */}
                <div className="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="#f9fafb" fillOpacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,144C960,149,1056,139,1152,122.7C1248,107,1344,85,1392,74.7L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                    </svg>
                </div>
            </section>

            {/* Features Section */}
            <section className="py-16 bg-gray-50">
                <div className="container mx-auto px-4">
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                        {/* Feature 1 */}
                        <div className="text-center p-8 bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow">
                            <div className="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg className="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 className="text-xl font-bold mb-2 text-gray-800">Best Prices</h3>
                            <p className="text-gray-600">Get the best deals and competitive prices on all products</p>
                        </div>

                        {/* Feature 2 */}
                        <div className="text-center p-8 bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow">
                            <div className="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg className="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <h3 className="text-xl font-bold mb-2 text-gray-800">Quality Products</h3>
                            <p className="text-gray-600">All products are carefully selected for premium quality</p>
                        </div>

                        {/* Feature 3 */}
                        <div className="text-center p-8 bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow">
                            <div className="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg className="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h3 className="text-xl font-bold mb-2 text-gray-800">Fast Delivery</h3>
                            <p className="text-gray-600">Quick and reliable shipping to your doorstep</p>
                        </div>
                    </div>
                </div>
            </section>

            {/* Featured Products Section */}
            <section className="py-16 bg-white">
                <div className="container mx-auto px-4">
                    <div className="text-center mb-12">
                        <h2 className="text-4xl font-bold text-gray-800 mb-4">Featured Products</h2>
                        <p className="text-gray-600 text-lg">Check out our most popular items</p>
                    </div>

                    {loading ? (
                        <div className="flex justify-center items-center h-64">
                            <div className="animate-spin rounded-full h-16 w-16 border-t-4 border-b-4 border-blue-600"></div>
                        </div>
                    ) : (
                        <>
                            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                                {featuredProducts.map((product) => (
                                    <div key={product.id} className="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all transform hover:-translate-y-2">
                                        <div className="h-48 bg-gray-200 overflow-hidden">
                                            <img
                                                src={product.image || 'https://via.placeholder.com/300x300?text=No+Image'}
                                                alt={product.name}
                                                className="w-full h-full object-cover hover:scale-110 transition-transform duration-300"
                                            />
                                        </div>
                                        <div className="p-4">
                                            <h3 className="text-lg font-semibold text-gray-800 mb-2 truncate">
                                                {product.name}
                                            </h3>
                                            <p className="text-gray-600 text-sm mb-3 line-clamp-2">
                                                {product.description}
                                            </p>
                                            <div className="flex items-center justify-between">
                                                <span className="text-2xl font-bold text-blue-600">
                                                    ${parseFloat(product.price).toFixed(2)}
                                                </span>
                                                <button className="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                ))}
                            </div>

                            <div className="text-center mt-10">
                                <button
                                    onClick={() => onNavigate('products')}
                                    className="bg-blue-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-blue-700 transition-all transform hover:scale-105 shadow-lg"
                                >
                                    View All Products
                                </button>
                            </div>
                        </>
                    )}
                </div>
            </section>

            {/* Categories Section */}
            <section className="py-16 bg-gray-50">
                <div className="container mx-auto px-4">
                    <div className="text-center mb-12">
                        <h2 className="text-4xl font-bold text-gray-800 mb-4">Shop by Category</h2>
                        <p className="text-gray-600 text-lg">Browse our wide range of product categories</p>
                    </div>

                    <div className="grid grid-cols-2 md:grid-cols-4 gap-6">
                        {[
                            { name: 'Electronics', icon: '💻', color: 'from-blue-400 to-blue-600' },
                            { name: 'Fashion', icon: '👗', color: 'from-pink-400 to-pink-600' },
                            { name: 'Home & Garden', icon: '🏡', color: 'from-green-400 to-green-600' },
                            { name: 'Sports', icon: '⚽', color: 'from-orange-400 to-orange-600' },
                        ].map((category, index) => (
                            <div
                                key={index}
                                className={`bg-gradient-to-br ${category.color} rounded-xl p-8 text-center cursor-pointer hover:scale-105 transition-transform shadow-lg`}
                            >
                                <div className="text-6xl mb-4">{category.icon}</div>
                                <h3 className="text-xl font-bold text-white">{category.name}</h3>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* CTA Section */}
            <section className="py-20 bg-gradient-to-r from-purple-600 to-blue-600 text-white">
                <div className="container mx-auto px-4 text-center">
                    <h2 className="text-4xl font-bold mb-4">Ready to Start Shopping?</h2>
                    <p className="text-xl mb-8 text-gray-100">Join thousands of satisfied customers today</p>
                    <button
                        onClick={() => onNavigate('products')}
                        className="bg-white text-blue-600 px-10 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition-all transform hover:scale-105 shadow-xl"
                    >
                        Browse Products
                    </button>
                </div>
            </section>

            {/* Newsletter Section */}
            <section className="py-16 bg-white">
                <div className="container mx-auto px-4">
                    <div className="max-w-2xl mx-auto text-center">
                        <h2 className="text-3xl font-bold text-gray-800 mb-4">Subscribe to Our Newsletter</h2>
                        <p className="text-gray-600 mb-6">Get the latest updates on new products and exclusive offers</p>
                        <form className="flex flex-col sm:flex-row gap-4">
                            <input
                                type="email"
                                placeholder="Enter your email"
                                className="flex-1 px-6 py-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                            />
                            <button
                                type="submit"
                                className="bg-blue-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-blue-700 transition-colors"
                            >
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    );
};

export default Home;