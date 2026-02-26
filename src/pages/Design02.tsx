import Header from "../components/Design01/Header.tsx";
import Hero from "../components/Design02/Hero.tsx";
import WelcomeSection from "../components/Design01/Welcome.tsx";
import CookiesPopup from "../components/Design01/CookiesPopup.tsx";
import MediaGrid from "../components/Design01/MediaGrid.tsx";
import Quote from "../components/Design01/Quote.tsx";
import ImageMarquee from "../components/reuseable/ImageMarquee.tsx";
import Footer from "../components/Shared/Footer.tsx";
import Step from "../components/Design01/Step.tsx";

const suiteItems = [
  { linkName: "Book it Now", href: "#", imageSrc: "/images/heros/01.webp", label: "Pearl Suite" },
  { linkName: "Book it Now", href: "#", imageSrc: "/images/heros/02.webp", label: "Foundry Room" },
  { linkName: "Book it Now", href: "#", imageSrc: "/images/heros/03.webp", label: "Harlech Suite" },
  { linkName: "Book it Now", href: "#", imageSrc: "/images/heros/04.webp", label: "Millennium" },
  { linkName: "Book it Now", href: "#", imageSrc: "/images/heros/05.webp", label: "Foundry Room" },
  { linkName: "Book it Now", href: "#", imageSrc: "/images/heros/06.webp", label: "Harlech Suite" },
  { linkName: "Book it Now", href: "#", imageSrc: "/images/heros/07.webp", label: "Millennium" },
];

const icons = [
  { imageSrc: "/images/icons/AirConditioning.svg", label: "Air Conditioning" },
  { imageSrc: "/images/icons/AudioVisualTech.svg", label: "AudioVisual Tech" },
  { imageSrc: "/images/icons/BikeStorage.svg", label: "Bike Storage" },
  { imageSrc: "/images/icons/BreakoutSpaces.svg", label: "Breakout Spaces" },
  { imageSrc: "/images/icons/CommunityEvents.svg", label: "Community Events" },
  { imageSrc: "/images/icons/Conference.svg", label: "Conference" },
  { imageSrc: "/images/icons/Courtyard.svg", label: "Courtyard" },
  { imageSrc: "/images/icons/Coworking.svg", label: "Coworking" },
  { imageSrc: "/images/icons/EVCharger.svg", label: "EV Charger" },
  { imageSrc: "/images/icons/FreeWifi.svg", label: "Free Wifi" },
  { imageSrc: "/images/icons/KitchenAreas.svg", label: "Kitchen Areas" },
  { imageSrc: "/images/icons/MeetingRoom.svg", label: "Meeting Room" },
  { imageSrc: "/images/icons/OfficeSpace.svg", label: "Office Space" },
  { imageSrc: "/images/icons/Parking.svg", label: "Parking" },
  { imageSrc: "/images/icons/PrivatePod.svg", label: "Private Pod" },
  { imageSrc: "/images/icons/Receptionist.svg", label: "Receptionist" },
  { imageSrc: "/images/icons/Shower.svg", label: "Shower" },
  { imageSrc: "/images/icons/SolarPanels.svg", label: "Solar Panels" },
  { imageSrc: "/images/icons/SupportStaff.svg", label: "Support Staff" },
  { imageSrc: "/images/icons/WellnessRoom.svg", label: "Wellness Room" }
];

export default function LambourneHomepage() {
  return <div className="design-02">
    <Header />
    <main>
      <Hero />
      <WelcomeSection />
      <MediaGrid />
      <Quote />
      <Step imageSide="left" backgroundImageSrc="/images/bgs/plant-03-small.webp"  subHeading="Let's Arrange a Time..." heading="Event & Conference Space" paragraphText="Our venue offers a dynamic setting perfect for corporate meetings, networking events, workshops, AGMs, exhibitions, training days, studio space and more. We can offer flexible layouts, modern facilities, and a dedicated support team, to ensure your event is a success." link={{url: "#link", name: "Get in touch"}} />
      <Step imageSide="right" subHeading="Become a member now" imageSrc="/images/heros/04.webp" heading="Coworking" paragraphText="Experience our dynamic co-working space, offering open desks, private offices, and shared meeting rooms. With high-speed internet, networking events, and a kitchen area, it’s ideal for freelancers, start-ups, and small businesses." link={{url: "#link", name: "Get in touch"}} />
      <ImageMarquee items={suiteItems} sectionPadY={50} textPosition="over-bottom" speedSeconds={80} imageHeightPx={550} pauseOnHover={false} cardWidthPx={320} borderRadius={false} gapPx={20} />
      <ImageMarquee items={icons} renderMode="image" speedSeconds={50} pauseOnHover={false} cardWidthPx={120} imageHeightPx={50} borderRadius={false} gapPx={20} />
      <Footer />
    </main>
    <CookiesPopup />
  </div>
}
