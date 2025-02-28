export default function () {

    const diferencialEmDias = ref(0);
    const diasPassados = (data:Date) => {
        const dataAtual = new Date();
        const diferencialEmSegundos = Math.abs(dataAtual.getTime() - data.getTime());
        diferencialEmDias.value = Math.ceil(diferencialEmSegundos / (1000 * 3600 * 24));
    }

    return {
        diasPassados,
        diferencialEmDias
    }
}