import ScrollMotion from "../reuseable/ScrollMotion.tsx";
import "./Quote.scss";

export default function Quote () {
    return (
        <div className="quote">
            <div className="quote-inner">
                <ScrollMotion
                    mode="in"
                    yStart={6.5}
                    progressEnd={0.3}
                    appearAt={0}
                    appearBy={0.25}
                >
                    <h2>Why choose Lambourne House?</h2>
                </ScrollMotion>
                <ScrollMotion
                    mode="in"
                    yStart={6.5}
                    progressEnd={0.8}
                    appearAt={0.2}
                    appearBy={0.2}
                >                              
                    <p>Lambourne House offers a variety of spaces including flexible offices, coworking areas, meeting rooms, conference facilities and event spaces, but also boasts a variety of unique features and amenities designed to support you, your business or event.</p>
                </ScrollMotion>
                <ScrollMotion
                    mode="in"
                    yStart={6.5}
                    progressEnd={1}
                    appearAt={0.3}
                    appearBy={0.3}
                >
                    <a className="link" href="#">More about us &rarr;</a>
                </ScrollMotion>
            </div>
        </div>
    )
}