import React, { ReactElement, ReactNode, useState } from "react";
import Tab, { TabProps } from "./Tab.tsx";
import './Tabs.scss';

interface TabsProps {
  children: ReactNode;
}

const Tabs: React.FC<TabsProps> = ({ children }) => {
  const [activeIndex, setActiveIndex] = useState(0);
  const [collapsed, setCollapsed] = useState(false);

  const tabs = React.Children.toArray(children).filter(
    (child): child is ReactElement<TabProps> =>
      React.isValidElement(child) && child.type === Tab
  );

  const activeTab = tabs[activeIndex];

  return (
    <div className={`tabs ${collapsed ? "tabs-collapsed" : ""}`}>
      <div className="tab-headers">
        <div className="tab-buttons">
          {tabs.map((tab, index) => {
            const label = tab.props.label ?? tab.props.children;

            return (
              <button
                key={index}
                type="button"
                className={index === activeIndex ? "active" : ""}
                onClick={() => setActiveIndex(index)}
              >
                {label}
              </button>
            );
          })}
        </div>

        <button
          type="button"
          className="tabs-toggle"
          onClick={() => setCollapsed(!collapsed)}
        >
          {collapsed ? "▶" : "◀"}
        </button>
      </div>

      <div className="tab-body">{activeTab}</div>
    </div>
  );
};

export default Tabs;
