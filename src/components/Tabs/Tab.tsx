import React, { ReactNode } from "react";

export interface TabProps {
  label?: ReactNode;
  children: ReactNode;
}

const Tab: React.FC<TabProps> = ({ children }) => {
  return <>{children}</>;
};

export default Tab;
