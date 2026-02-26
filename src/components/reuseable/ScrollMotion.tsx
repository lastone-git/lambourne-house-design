import React, { useEffect, useRef, useState } from "react";
import {
  motion,
  useReducedMotion,
  useScroll,
  useSpring,
  useTransform,
} from "framer-motion";

type ScrollMotionProps = {
  children: React.ReactNode;
  offset?: [string, string];

  xStart?: number;
  xEnd?: number;
  yStart?: number;
  yEnd?: number;

  animateOpacity?: boolean;
  appearAt?: number;
  appearBy?: number;

  smooth?: boolean;
  stiffness?: number;
  damping?: number;
  mass?: number;

  disableBelowPx?: number;
};

export default function ScrollMotion({
  children,
  offset = ["start 85%", "end 35%"],

  xStart = 0,
  xEnd = 0,
  yStart = 0,
  yEnd = 0,

  animateOpacity = true,
  appearAt = 0,
  appearBy = 0.3,

  smooth = true,
  stiffness = 90,
  damping = 22,
  mass = 0.9,

  disableBelowPx = 800,
}: ScrollMotionProps) {
  const ref = useRef<HTMLDivElement>(null);
  const prefersReducedMotion = useReducedMotion();

  const [disableForWidth, setDisableForWidth] = useState(false);

  useEffect(() => {
    const mq = window.matchMedia(`(max-width: ${disableBelowPx - 1}px)`);

    const apply = () => setDisableForWidth(mq.matches);
    apply();

    const handler = () => apply();

    if (mq.addEventListener) mq.addEventListener("change", handler);
    else mq.addListener(handler);

    return () => {
      if (mq.removeEventListener) mq.removeEventListener("change", handler);
      else mq.removeListener(handler);
    };
  }, [disableBelowPx]);

  const motionOff = disableForWidth || prefersReducedMotion;

  const { scrollYProgress } = useScroll({ target: ref, offset });

  // When motion is off, force NO translation (prevents overlap)
  const xFrom = motionOff ? 0 : xStart;
  const xTo = motionOff ? 0 : xEnd;
  const yFrom = motionOff ? 0 : yStart;
  const yTo = motionOff ? 0 : yEnd;

  const rawX = useTransform(scrollYProgress, [0, 1], [xFrom, xTo]);
  const rawY = useTransform(scrollYProgress, [0, 1], [yFrom, yTo]);

  const rawOpacity = useTransform(
    scrollYProgress,
    [appearAt, Math.min(1, appearAt + appearBy)],
    [0, 1]
  );

  const springConfig = { stiffness, damping, mass };

  const springX = useSpring(rawX, springConfig);
  const springY = useSpring(rawY, springConfig);
  const springOpacity = useSpring(rawOpacity, springConfig);

  const x = smooth ? springX : rawX;
  const y = smooth ? springY : rawY;
  const opacity = smooth ? springOpacity : rawOpacity;

  return (
    <motion.div
      ref={ref}
      className="motion-line"
      style={{
        x,
        y,
        opacity: motionOff ? 1 : animateOpacity ? opacity : 1,
        willChange: motionOff ? undefined : "transform, opacity",
      }}
    >
      {children}
    </motion.div>
  );
}