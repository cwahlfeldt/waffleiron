import { useState } from "react";

export default function Card({ title }) {
  const [count, setCount] = useState(0);

  return (
    <section data-root>
      <h1>Vite + {title}</h1>
      <div className="card">
        <button onClick={() => setCount((count) => count + 1)}>
          count is {count}
        </button>
        <p>
          Edit <code>src/App.jsx</code> and save to test HMR
        </p>
      </div>
      <p className="read-the-docs">
        Click on the Vite and React logos to learn more
      </p>
    </section>
  );
}

export const type = {
  HeadingBlock: {
    fields: {
      title: { type: "text" },
    },
    defaultProps: {
      title: "Heading",
    },
    render: (props) => <Card {...props} />,
  },
};
