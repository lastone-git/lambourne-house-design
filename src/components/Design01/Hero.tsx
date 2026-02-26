import React, { useRef } from "react";
import { motion, useScroll, useTransform } from "framer-motion";
import { DotLottieReact } from "@lottiefiles/dotlottie-react";
import "./Hero.scss";

type Props = {
  imageUrl?: string;
  movePx?: number;
  heading?: string;
  title?: React.ReactNode;
  subtitle?: React.ReactNode;
};

export default function Hero({
  imageUrl = "/images/heros/00.webp",
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

  const { scrollYProgress } = useScroll({
    target: ref,
    offset: ["start start", "end start"],
  });

  const y = useTransform(scrollYProgress, [0, 1], [0, movePx]);

  return (
    <section ref={ref} className="hero">
      <div className="parallax-wrap parallax-wrap-wrap">
        <motion.div
          className="parallax-media parallax-wrap-media"
          style={{
            y,
            backgroundImage: `url(${imageUrl})`,
          }}
        >
          <div className="hero-content">
            <div className="hero-content-container">
              {/* <p className="eyebrow">{heading}</p> */}
              <h1>{title}</h1>
              <p className="lede">{subtitle}</p>

              {/* <div className="cta-row">
                <a className="btn primary" href="#journeys">Our Spaces</a>
                <a className="btn ghost" href="#featured">Featured</a>
              </div> */}

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