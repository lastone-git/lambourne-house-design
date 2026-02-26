import Design01 from "./pages/Design01.tsx";
import Design02 from "./pages/Design02.tsx";
import logo from './logo.svg';
import './App.scss';
import Tabs from "./components/Tabs/Tabs.tsx";
import Tab from "./components/Tabs/Tab.tsx";

function App() {
  return (
    <div className="App">
      
      <Tabs>
        <Tab label="Design 1">
          <Design01 />
        </Tab>
        <Tab label="Design 2">
          <Design02 />
        </Tab>
        <Tab label="Design 3">Content for Tab 3</Tab>
      </Tabs>
    </div>
  );
}

export default App;
