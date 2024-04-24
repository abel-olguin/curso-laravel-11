import EditorJS from "@editorjs/editorjs";
import Header from "@editorjs/header";
import List from "@editorjs/list";
import Image from "@editorjs/image";
import Quote from "@editorjs/quote";
import Embed from "@editorjs/embed";

document.addEventListener('alpine:init', () => {
    Alpine.data('editor', (data = {}) => ({
        editor: null,
        init() {
            this.editor = new EditorJS({
                holder: 'editor',
                minHeight: 20,
                data,
                readOnly: true,
                tools: {
                    header: Header,
                    list: List,
                    image: Image,
                    quote: Quote,
                    embed: Embed,
                },
            })
        },

    }))
})
