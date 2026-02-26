import React from "react";
import ScrollMotion from "../reuseable/ScrollMotion.tsx";
import "./Welcome.scss";

export default function Welcome() {
  return (
    <section className="welcome">
      <img className="background-image" src="/images/bgs/plant-04-small.webp" alt="Plant 02" />

      <div className="welcome-inner">
        <ScrollMotion
          mode="in"
          yStart={6.5}
          progressEnd={0.3}
          appearAt={0}
          appearBy={0.25}
        >
          <h2>Welcome to Lambourne House</h2>
        </ScrollMotion>

        <ScrollMotion
          mode="in"
          xStart={-10}
          yStart={0}
          progressEnd={1}
          appearAt={0.2}
          appearBy={0.5}
        >
          <h2>Rooms & Spaces For Hire</h2>
        </ScrollMotion>

        <ScrollMotion
          mode="in"
          yStart={5.5}
          progressEnd={1.1}
          appearAt={0.3}
          appearBy={0.2}
        >
          <h2>- Available Now -</h2>
        </ScrollMotion>
      </div>
    </section>
  );
}
