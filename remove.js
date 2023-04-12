const { array } = require('yargs')
const notes = require('./notes')
const fs = require('fs')
const path = require('path')

const pathNote = path.join(__dirname, 'notes.json')

const saveNotes = (content) => {
    fs.writeFile(pathNote, JSON.stringify(content), err => {
        if (err) {
            throw new Error(err)
        }
    })
}

const remove = (number) => {
    notes.getNotes((note) => {
        try {
            const removed = note.splice(number, 1)
            console.log(`Заметка под номером ${number} удалена`);
            saveNotes(note)
        } catch {
            console.log(`Заметка под номером ${number} не найдена`);
        }
    })
}

module.exports = {
    remove
}