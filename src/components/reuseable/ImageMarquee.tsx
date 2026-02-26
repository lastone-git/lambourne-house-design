import React from "react";
import "./ImageMarquee.scss";

type MarqueeItem = {
  href?: string;
  linkName?: string;
  imageSrc: string;
  label: string;
  ariaLabel?: string;
};

type TextPosition = "below" | "over-bottom" | "over-center" | "over-top";

type ImageMarqueeProps = {
  items?: MarqueeItem[];

  speedSeconds?: number;

  cardWidthPx?: number;
  imageHeightPx?: number;
  gapPx?: number;
  
  pauseOnHover?: boolean;
  scaleOnHover?: boolean;
  
  renderMode?: "background" | "image";
  textPosition?: TextPosition;
  borderRadius?: boolean;

  sectionBg?: string;
  sectionPadY?: number;
};

export default function ImageMarquee({
  items = [],

  speedSeconds = 28,

  cardWidthPx = 360,
  imageHeightPx = 360,
  gapPx = 18,

  pauseOnHover = true,
  scaleOnHover,
  borderRadius = true,

  renderMode = "background",
  textPosition = "below",

  sectionBg = "transparent",
  sectionPadY = 12,
}: ImageMarqueeProps) {
  if (!items.length) return null;

  const effectiveScaleOnHover = scaleOnHover ?? pauseOnHover;
  const trackItems = [...items, ...items];

  return (
    <section
      className={[
        "image-marquee",
        pauseOnHover ? "is-pausable" : "is-continuous",
        effectiveScaleOnHover ? "has-scale" : "no-scale",
        renderMode === "image" ? "mode-image" : "mode-background",
        `text-${textPosition}`,
      ].join(" ")}
      style={{
        ["--speed" as any]: `${speedSeconds}s`,
        ["--cardW" as any]: `${cardWidthPx}px`,
        ["--imgH" as any]: `${imageHeightPx}px`,
        ["--gap" as any]: `${gapPx}px`,
        ["--sectionBg" as any]: sectionBg,
        ["--padY" as any]: `${sectionPadY}px`,
      }}
    >
      <div className="image-marquee__viewport">
        <div className="image-marquee__track">
          {trackItems.map((item, i) => (
            <a
              key={`${item.href}-${i}`}
              className="image-marquee__card"
              href={item.href}
              aria-label={item.ariaLabel ?? item.label}
            >
              {renderMode === "background" && (
                <div
                  className={["image-marquee__media", !borderRadius ? "no-border-radius" : ""].join(" ")}
                  style={{ backgroundImage: `url(${item.imageSrc})` }}
                >
                  {(textPosition !== "below") && (
                    <div className="image-marquee__overlay">
                      <span className="image-marquee__label">{item.label}</span>
                      <span className="image-marquee__link">{item.linkName}</span>
                    </div>
                  )}
                </div>
              )}

              {renderMode === "image" && (
                <>
                  <img
                    className="image-marquee__img"
                    src={item.imageSrc}
                    alt={item.label}
                    loading="lazy"
                    draggable={false}
                  />

                  <div className="image-marquee__below">
                    <span className="image-marquee__label">{item.label}</span>
                    <span className="image-marquee__link">{item.linkName}</span>
                  </div>
                </>
              )}
            </a>
          ))}
        </div>
      </div>
    </section>
  );
}
