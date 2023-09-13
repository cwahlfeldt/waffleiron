// Editor.jsx
import { Puck } from "@measured/puck";
import config from "./config";

// Describe the initial data
const initialData = {title: 'Hello World'};

// Save the data to your database
const save = (data) => {};

// Render Puck editor
export default function Editor() {
  return <Puck config={config} data={initialData} onPublish={save} />;
}