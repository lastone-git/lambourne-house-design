import React from "react";
import "./Step.scss";

type Props = {
  imageSide?: "left" | "right";
  imageSrc?: string;
  backgroundImageSrc?: string;
  heading?: string;
  subHeading?: string;
  paragraphText?: React.ReactNode;
  link: { url: string; name: string };
};

export default function Step({
  imageSide = "left",
  imageSrc = "/images/heros/09.webp",
  backgroundImageSrc = "",
  heading = "",
  subHeading = "",
  paragraphText = "",
  link,
}: Props) {

  const imageSideOpp = imageSide === "left" ? "right" : "left";

  return (
    <section className={`section-step section-step-${imageSide}`}>
      {backgroundImageSrc && <img className={["background-image", "background-image-" + imageSideOpp].join(" ")} src={backgroundImageSrc} alt="Plant Background" />}
      <div
        className="section-step-image"
        style={{ backgroundImage: `url(${imageSrc})` }}
        aria-hidden="true"
      />
      <div className="section-step-content">
        <span>{subHeading}</span>
        {heading && <h3>{heading}</h3>}
        {paragraphText && <p>{paragraphText}</p>}
        <a className="link" href={link.url}>
          {link.name}
        </a>
      </div>
    </section>
  );
}