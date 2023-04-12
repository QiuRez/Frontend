const notes = require('./notes')

const read = (number) => {
    notes.getNotes((note) => {
        if(typeof note[number] == 'undefined') {
            console.log('Заметки с таким номерои не существует');
        } else {
            console.log(note[number]);
        }
    })
}

module.exports = {
    read
}
