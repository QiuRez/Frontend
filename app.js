const yargs = require('yargs')
const pkg = require('./package.json')
const notes = require('./notes')
const list = require('./list')
const { number } = require('yargs')
const read = require('./read')
const remove = require('./remove')

yargs.version(pkg.version)

yargs.command({
    command: 'add',
    describe: 'Добавить новую заметку',
    builder : {
        title: {
            type: 'string',
            demandOption: true,
            describe: 'Название заметки'
        },
        text: {
            type: 'string',
            demandOption: true,
            describe: 'Текст заметки'
        }
    },
    handler({title, text}) {
        notes.addNote(title, text)
    }
})

yargs.command({
    command: 'list',
    describe: 'Показать список заметок',
    handler() {
        list.checkList()
    }
})



yargs.command({
    command: 'read',
    describe: 'Показывает контент выбранной заметки',
    builder: {
        n: {
            type: 'int',
            demandOption: true,
            describe: 'Номер заметки'
        }
    },
    handler({n}) {
        read.read(n)
    }
})

yargs.command({
    command: 'remove',
    describe: 'Удаляет заметку',
    builder: {
        n: {
            type: 'int',
            demandOption: true,
            describe: 'Номер удаляемой заметки'
        }
    },
    handler({n}) {
        remove.remove(n)
    }
})

yargs.parse()