import "@measured/puck/dist/index.css";
import "./styles.css";
import Main from '../../theme/design-system/__layouts/Main';

export default function RootLayout({children, context}) {
  return (
    <Main context={context}>
      {children}
    </Main>
  );
}
