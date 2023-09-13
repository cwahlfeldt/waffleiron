// Page.jsx
import { Render } from "@measured/puck";
import config, {data} from "./config";

export default function RenderEditor() {
  return <Render config={config} data={data} />;
}