import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import 'element-plus/dist/index.css'


createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', {eager: true})
        return pages[`./Pages/${name}.vue`]
    },
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .mount(el)
    },
    title: title => `${title}`,
}).then(r => r)
