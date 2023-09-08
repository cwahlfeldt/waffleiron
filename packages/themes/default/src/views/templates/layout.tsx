import React from 'react'
import Html from './html'

export default function Layout({ children }) {
    return (
        <Html>
            <header>
                <h1>My Site</h1>
            </header>
            <main>
                {children}
            </main>
            <footer>
                <p>© 2020</p>
            </footer>
        </Html>
    )
}