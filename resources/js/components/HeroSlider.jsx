import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Pagination, Autoplay } from "swiper/modules";

const slides = [
  { id: 1, img: "https://picsum.photos/id/237/800/500", title: "Modern Furniture", subtitle: "Customize Your Comfort" },
  { id: 2, img: "https://picsum.photos/id/182/800/500", title: "Festive Offers", subtitle: "Flat 20% on Sofas" },
  { id: 3, img: "https://picsum.photos/id/200/800/500", title: "UrbanWood Style", subtitle: "Designed for Indian Homes" },
];

export default function HeroSection() {
  return (
    <section className="w-full bg-gray-50 py-4 sm:py-6 md:py-8">
      <div className="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-4 px-4">
        {/* Slider Area (takes 2/3 width on large screens) */}
        <div className="lg:col-span-2 relative rounded-xl overflow-hidden">
          <Swiper
            modules={[Navigation, Pagination, Autoplay]}
            navigation
            pagination={{ clickable: true }}
            autoplay={{ delay: 4000 }}
            loop
            className="w-full h-[250px] sm:h-[350px] md:h-[420px] lg:h-[500px]"
          >
            {slides.map((s) => (
              <SwiperSlide key={s.id}>
                <div
                  className="h-full bg-cover bg-center flex flex-col justify-center items-start text-white px-6 sm:px-10"
                  style={{
                    backgroundImage: `url(${s.img})`,
                  }}
                >
                  {/* <div className="bg-black/40 p-4 sm:p-6 rounded-md max-w-lg">
                    <h2 className="text-2xl sm:text-3xl md:text-5xl font-bold drop-shadow-md">
                      {s.title}
                    </h2>
                    <p className="text-sm sm:text-base md:text-lg mt-2 drop-shadow-sm">
                      {s.subtitle}
                    </p>
                    <button className="mt-4 bg-white text-black px-4 py-2 rounded-md text-sm sm:text-base hover:bg-gray-200 transition">
                      Shop Now
                    </button>
                  </div> */}
                </div>
              </SwiperSlide>
            ))}
          </Swiper>
        </div>

        {/* Right Side Offer Area (hidden on mobile) */}
        <div className="hidden lg:flex flex-col justify-between gap-4">
          <img
            src="https://picsum.photos/400/300"
            alt="Offer 1"
            className="w-full h-[240px] object-cover rounded-xl shadow-sm"
            loading="lazy"
          />
          <img
            src="https://picsum.photos/400/300"
            alt="Offer 2"
            className="w-full h-[240px] object-cover rounded-xl shadow-sm"
            loading="lazy"
          />
        </div>
      </div>
    </section>
  );
}