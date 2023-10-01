import 'theme/src/index.css';
import 'theme/src/App.css';
import type { Config } from "@measured/puck";
import App from 'theme/src/App';

type Props = {
  HeadingBlock: { title: string };
};

export const config: Config<Props> = {
  components: {
    HeadingBlock: {
      fields: {
        title: { type: "text" },
      },
      defaultProps: {
        title: "Heading",
      },
      render: ({ title }) => (
        <App />
      ),
    },
  },
};

export default config;
