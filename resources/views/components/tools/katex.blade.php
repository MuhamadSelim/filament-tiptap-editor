@props([
    'fieldId' => null,
])

<x-filament-tiptap-editor::button
    x-show="tools.includes('katex')"
    style="display: none;"
    action="openModal()"
    active="'katex'"
    x-on:insert-vimeo.window="$event.detail.fieldId === '{{ $fieldId }}' ? insertVideo($event.detail.video) : null"
    label="{{ __('filament-tiptap-editor::editor.katex') }}"
    icon="katex"
    x-data="{
        openModal() {
            $dispatch('open-modal', {
                id: 'filament-tiptap-editor-katex-modal',
                fieldId: '{{ $fieldId }}',
            });
        },
        insertVideo(video) {
            if (video.url === null) {
                return;
            }

            console.log(video);

            this.editor()
                .chain()
                .focus()
                .setVimeoVideo({
                    src: video.url,
                    width: video.width ?? 640,
                    height: video.height ?? 480,
                    autoplay: video.autoplay ? 1 : 0,
                    loop: video.loop ? 1 : 0,
                    title: video.show_title ? 1 : 0,
                    byline: video.byline ? 1 : 0,
                    portrait: video.portrait ? 1 : 0,
                    responsive: video.responsive ?? true,
                })
                .run();
        }
    }"
/>
