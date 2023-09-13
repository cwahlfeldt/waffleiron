import App from "../App";
import * as seedData from "./data.json";

// Create puck component config
export default {
    components: {
        HeadingBlock: {
            fields: {
                children: {
                    type: "text",
                },
            },
            render: ({ children }) => {
                return App();
            },
        },
    },
};

console.log(seedData.default);

export const data = seedData.default;