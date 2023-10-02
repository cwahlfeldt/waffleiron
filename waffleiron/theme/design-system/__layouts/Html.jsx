export default function Html({ children, headComponents, htmlAttributes, bodyAttributes }) {
  return (
    <html {...htmlAttributes}>
      <head>
        <meta charSet="utf-8" />
        <title>Design System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="/styles.css" />
        {headComponents}
      </head>
      <body {...bodyAttributes}>
        {children}
      </body>
    </html>
  );
}
