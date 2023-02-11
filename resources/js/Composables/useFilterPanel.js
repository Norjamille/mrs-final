import { ref } from 'vue'

export function useFilterPanel() {
    let show = ref(false)

    const open = () => {
        show.value = true
    }

    const close = () => {
        show.value = false
    }

    const toggle = () => {
        show.value = !show.value
    }

    return {
        show,
        open,
        close,
        toggle
    }
}