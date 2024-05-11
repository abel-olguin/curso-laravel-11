import EditorJS from "@editorjs/editorjs";
import Header from "@editorjs/header";
import List from "@editorjs/list";
import Image from "@editorjs/image";
import Quote from "@editorjs/quote";
import Embed from "@editorjs/embed";

window.Livewire.hook('component.init', () => {
    Alpine.data('editor', (data = {}, readOnly = false) => ({
        open: false,
        editor: null,
        init() {
            console.log('init editor')
            window.Livewire.on('createPostModalEndRender', () => {
                this.editor?.destroy();
                this.editor = new EditorJS({
                    holder: 'editor',
                    minHeight: 20,
                    inlineToolbar: ['link', 'bold', 'italic',],
                    placeholder: 'Aquí tu contenido',
                    data,
                    readOnly,
                    tools: {
                        header: {
                            class: Header,
                            inlineToolbar: true
                        },
                        list: {
                            class: List,
                            inlineToolbar: true
                        },
                        image: {
                            class: Image,
                            config: {
                                endpoints: {
                                    byFile: '/dashboard/media',
                                },
                                additionalRequestData: {
                                    _token: document.querySelector('meta[name="csrf"]')?.content
                                }
                            },

                        },
                        quote: {
                            class: Quote,
                            inlineToolbar: true,
                            shortcut: 'CMD+SHIFT+O',
                            config: {
                                quotePlaceholder: 'Enter a quote',
                                captionPlaceholder: 'Quote\'s author',
                            },
                        },
                        embed: {
                            class: Embed,
                            config: {
                                services: {
                                    youtube: true,
                                    twitter: true,
                                    instagram: true,
                                    facebook: true,
                                }
                            }
                        },
                    },
                })
            })
        },
        beforeSend() {
            this.editor.save().then((data) => {
                const component = window.Livewire.getByName('modals.create-post-modal')[0].__instance
                component.reactive.form.description = data.blocks.length ? JSON.stringify(data) : ''
                component.$wire.store()
            }).catch((error) => {
                console.log('Saving failed: ', error)
            });
        }
    }))
})

