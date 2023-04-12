const fs = require('fs')
const path = require('path')

const notePath = path.join(__dirname, 'notes.json')

const getNotes = (callback) => {
    fs.readFile(notePath, 'utf-8', (err, content) => {
        if (err) {
            throw new Error(err)
        }

        try {
            callback(JSON.parse(content))
        } catch(e) {
            callback([])
        }
    })
}

const saveNotes = (content) => {
    fs.writeFile(notePath, JSON.stringify(content), err => {
        if (err) {
            throw new Error(err)
        } 
    })
}

const addNote = (title, text) => {
    getNotes((notes) => {
        const dublicateNote = notes.find(note => note.title === title)

        if(dublicateNote) {
            console.log('Заметка с тиким названием уже существует');
        } else {
            notes.push({title, text})
            saveNotes(notes)
            console.log('Заметка добавлена');
        }
    })
}

module.exports = {
    addNote,
    getNotes
}