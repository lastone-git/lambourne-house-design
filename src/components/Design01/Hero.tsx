import React, { useEffect, useRef, useState } from "react";
import { motion, AnimatePresence, useScroll, useTransform } from "framer-motion";
import { DotLottieReact } from "@lottiefiles/dotlottie-react";
import "./Hero.scss";

type Props = {
  movePx?: number;
  heading?: string;
  title?: React.ReactNode;
  subtitle?: React.ReactNode;
};

const SLIDE_MS = 10000;

const slideVariants = {
  enter: (direction: 1 | -1) => ({
    x: direction === 1 ? "100%" : "-100%",
    opacity: 1,
  }),
  center: {
    x: "0%",
    opacity: 1,
  },
  exit: (direction: 1 | -1) => ({
    x: direction === 1 ? "-100%" : "100%",
    opacity: 1,
  }),
};

export default function Hero({
  movePx = -220,
  heading = "Spaces That Work for You",
  title = (
    <>
      A Collaborative space<br />for the Everyday
    </>
  ),
  subtitle = (
    <>
      Host events, run meetings, or grow your business in adaptable,
      <br />
      fully equipped spaces backed by dedicated support.
      <br />
      <br />
      <b>Contact us now at 029 2082 7550</b>
    </>
  ),
}: Props) {
  const ref = useRef<HTMLElement | null>(null);

  const images = ["/images/heros/00.webp", "/images/heros/10.webp"];
  const [index, setIndex] = useState(0);
  const [direction, setDirection] = useState<1 | -1>(1); // 1 = swipe left to next, -1 = swipe right

  // Optional: preload so no blank frame on swap
  useEffect(() => {
    images.forEach((src) => {
      const img = new Image();
      img.src = src;
    });
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, []);

  useEffect(() => {
    const t = setInterval(() => {
      setDirection(1);
      setIndex((prev) => (prev + 1) % images.length);
    }, SLIDE_MS);

    return () => clearInterval(t);
  }, [images.length]);

  const { scrollYProgress } = useScroll({
    target: ref,
    offset: ["start start", "end start"],
  });

  const y = useTransform(scrollYProgress, [0, 1], [0, movePx]);

  return (
    <section ref={ref} className="hero">
      <div className="parallax-wrap parallax-wrap-wrap">
        {/* This still handles the parallax movement */}
        <motion.div className="parallax-media parallax-wrap-media" style={{ y }}>
          {/* Swipe layer */}
          <div className="hero-swipe">
            <AnimatePresence initial={false} custom={direction}>
              <motion.div
                key={images[index]}
                className="hero-slide"
                custom={direction}
                variants={slideVariants}
                initial="enter"
                animate="center"
                exit="exit"
                transition={{ duration: 0.8, ease: [0.22, 1, 0.36, 1] }}
                style={{ backgroundImage: `url(${images[index]})` }}
              />
            </AnimatePresence>
          </div>

          {/* Content stays static on top */}
          <div className="hero-content">
            <div className="hero-content-container">
              <h1>{title}</h1>
              <p className="lede">{subtitle}</p>

              <div className="mouse-scroll">
                <span>Scroll for more</span>
                <DotLottieReact
                  className="scroll-icon"
                  src="https://lottie.host/64b0a81c-0c68-4dd5-bed2-d51e1b3bac88/1Ct3w3Yuai.lottie"
                  autoplay
                  loop
                />
              </div>
            </div>
          </div>
        </motion.div>
      </div>
    </section>
  );
}