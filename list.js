const { count } = require('console')
const { ALL } = require('dns')
const fs = require('fs')
const path = require('path')

const notePath = path.join(__dirname, 'notes.json')

const getNotes = (callback) => {
    fs.readFile(notePath, 'utf-8', (err, content) => {
        if (err){
            throw new Error(err)
        }

        try {
            callback(JSON.parse(content))
        } catch(err) {
            callback([])
        }
    })
}

const checkList = () => {
    getNotes((notes) => {
    console.log(notes);
 
})}

module.exports = {
    checkList
}
