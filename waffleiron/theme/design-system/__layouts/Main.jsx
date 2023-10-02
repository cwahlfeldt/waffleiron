import Header from "../___blocks/Header/Header";
import Footer from "../___blocks/Footer/Footer";
import Html from "./Html";

export default function Main({ children, context }) {
  return (
    <Html>
      <Header context={context} />
      <main id="main-landmark">{children}</main>
      <Footer context={context} />
    </Html>
  );
}
