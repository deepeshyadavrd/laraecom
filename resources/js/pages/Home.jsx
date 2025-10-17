import Navbar from "../components/Navbar";
import OfferSlider from "../components/OfferSlider";
import HeroSlider from "../components/HeroSlider";

export default function Home() {
  return (
    <div>
      <OfferSlider />
      <Navbar />
      <HeroSlider />
      <div className="p-8 text-center">
        <h2 className="text-2xl font-semibold mb-4">Featured Products</h2>
        <p>Product grid will go here...</p>
      </div>
    </div>
  );
}
