import React from "react";
import ScrollMotion from "../reuseable/ScrollMotion.tsx";
import "./MediaGrid.scss";

export default function MediaGrid() {
  return (
    <section className="media-grid">
      <img className="background-image" src="/images/bgs/plant-02-small.webp" alt="Plant Background" />
      <div className="media-grid-container">
        <ScrollMotion 
          yStart={-20} 
          animateOpacity={false}
        >
          <div className="media-col">
            <div className="media-item">
              <img src="/images/stock/02.webp" alt="01" />
            </div>
          </div>
        </ScrollMotion>

        <ScrollMotion yStart={0} animateOpacity={false}>
          <div className="media-col center">
            <div className="media-item">
              <video src="/videos/office.mp4" autoPlay muted loop playsInline />
            </div>
          </div>
        </ScrollMotion>

        <ScrollMotion
          yStart={-200}
          progressEnd={1}
          animateOpacity={false}
        >
          <div className="media-col">
            <div className="media-item">
              <img src="/images/stock/21.webp" alt="02" />
            </div>
            <div className="media-item">
              <img src="/images/stock/06.webp" alt="03" />
            </div>
          </div>
        </ScrollMotion>
      </div>
    </section>
  );
}
