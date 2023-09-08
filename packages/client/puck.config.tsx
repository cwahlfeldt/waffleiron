import type { Config } from "@measured/puck";

type Props = {
  HeadingBlock: { title: string, text: string };
};

export const config: Config<Props> = {
  components: {
    HeadingBlock: {
      fields: {
        title: { type: "text" },
        text: { type: "textarea" }
      },
      defaultProps: {
        title: "Heading",
        text: "Text"
      },
      render: (data) => (
        <div style={{ padding: 64 }}>
          <h1>{data.title}</h1>
          <p>{data.text}</p>
        </div>
      ),
    },
  },
};

export default config;
