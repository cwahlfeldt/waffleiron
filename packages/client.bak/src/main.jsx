import React from 'react'
import ReactDOM from 'react-dom/client'
import Editor from './editor/Editor.jsx'
import './index.css'
import RenderEditor from './editor/Render.jsx'

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <Editor />
    <RenderEditor />
  </React.StrictMode>,
)
