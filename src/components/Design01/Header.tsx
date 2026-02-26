import { useEffect, useState } from "react";
import { ReactComponent as Logo } from "../../icons/lambourne_house_logo.svg";
import { ReactComponent as Arrow } from "../../icons/arrow-down.svg";

export default function Header() {
  const [scrolled, setScrolled] = useState(false);

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 20);
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  return (
    <header className={`site-header ${scrolled ? "scrolled" : ""}`}>
      <nav className="nav">
        <a className="logo" href="#">
          <Logo />
        </a>

        <div className="nav-links">
          <button className="basic hamburger">
            <span></span><span></span><span></span>
          </button>

          <ul className="nav-links-container">
            <li>
              <a href="#about">
                Our Story
                <span><Arrow /></span>
              </a>
              <ul className="nav-sub-links">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Our Services</a></li>
                <li><a href="#">Our Process</a></li>
                <li><a href="#">Our Team</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </li>

            <li>
              <a href="#spaces">
                Meeting Rooms
                <span><Arrow /></span>
              </a>
              <ul className="nav-sub-links">
                <li><a href="#">Pearl Suite</a></li>
                <li><a href="#">Harlech Suite</a></li>
                <li><a href="#">Foundry Room</a></li>
                <li><a href="#">Murrayfield Room</a></li>
                <li><a href="#">Pods</a></li>
                <li><a href="#">Pods</a></li>
              </ul>
            </li>

            <li>
              <a href="#spaces">Co working</a>
            </li>
          </ul>
          
          {/* <a href="#">
            <button className="alt">Call 029 2082 7550</button>
          </a> */}

          <a  href="https://new-directions.officernd.com/public/calendar/meeting_room">
            <button>Book a meeting room</button>
          </a>
        </div>
      </nav>
    </header>
  );
}