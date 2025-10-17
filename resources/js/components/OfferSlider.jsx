import { Swiper, SwiperSlide } from "swiper/react";
import { Autoplay } from "swiper/modules";

const offers = [
  "🎉 Flat 10% off on all Dining Sets",
  "🚚 Free Delivery on Orders above ₹5,000",
  "🛠️ 5-Year Warranty on Custom Furniture",
];

export default function OfferSlider() {
  return (
    <div className="bg-yellow-100 py-2 text-center text-xs sm:text-sm font-medium">
      <Swiper
        modules={[Autoplay]}
        autoplay={{ delay: 3000, disableOnInteraction: false }}
        loop
        slidesPerView={1}
        allowTouchMove={false}
      >
        {offers.map((offer, i) => (
          <SwiperSlide key={i}>
            <p className="truncate">{offer}</p>
          </SwiperSlide>
        ))}
      </Swiper>
    </div>
  );
}
