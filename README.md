# Remote Group Bowling TDD Kata
## Game scenario
The Kata here is a slight enhancement of the original idea presented by uncle Bob. Group meets and each of the steps of TDD is executed 
by a different person is some cyclic order. Kata master may, or may not dictate what use case should be tested next, but the rest
is up to the participants. Idea is to help a group to get familiar with the TDD process. 
In standard environment, we meet in the max groups of 6, simply passing the keyboard around. For remote environments 
(like the one we have at [Wikimedia Foundation](https://wikimediafoundation.org/) this isn't feasible. Let's try a more remote-friendly approach.

## Environment
This Kata is meant to be executed in remote environment and after some dose of research 
I found that at the moment, Microsoft Visual Studio is best suited for the job 
(or at least a setup was easier and IMHO most trustworthy). The main idea was to make a setup process
as quick and easy as possible, so anyone can join without much hassle.


Other contenders (with grounds for rejection):
* Atom + Teletype (subjectively more difficult Java IDE setup)
* IntelliJ Idea + Floobits (new account needed to be created and centralized code storage - second one isn't a huge issue, though).
* any video conferencing tool with screen control ( hard to keep track of multiple users, inefficient bandwidth use for our use case)


Why Visual Studio Code? 
* Installing Java IDE support and Live Share is extremely easy
* It requires login, but allows you to login with github account, which most people already have
* Allows for direct connection between peers, with cloud based alternative

### Set up instructions
1. Clone this repo
1. Download [Microsoft Visual Studio Code](https://code.visualstudio.com/download)
1. Install [Java Extension Pack](https://marketplace.visualstudio.com/items?itemName=vscjava.vscode-java-pack).
    * The pack contains all we need for development, including nice IntelliSense autocompletion and support for Maven.
    * Java language support may have issues with detecting you JDK - in that case configure it manually. Easiest way I found of doing this
  is to edit the *settings.json* file, located in ~/Library/Application Support/Code/User/settings.json (on macOS). Just add *java.home*
  property, with the correct path to JDK root.
1. *File* > *Add Folder to Workspace* and this project. Maven file should be read automatically and everythins should be ready to go.
1. Install [VS Live Share](https://marketplace.visualstudio.com/items?itemName=MS-vsliveshare.vsliveshare). I'd recommend reading the manual on this page, too. 
It describes how to set up the session, so I won't repeat the instructions here.
    * if you're going to host a session, I'd recommend to:
      * Unshare terminals (unless you're ok, with people using your computer freely). You can remove Shared Terminals and uncheck "Auto Share Terminals"
    (you can search for the option in the settings, so I won't provide you with a path here).
      * It again depends how much do you trust your participants, but "Allow Guest Command Control" is a nice option, that allow participants
    to run their test from Code Actions - quite useful for this kind of exercise.
1. (Optional) For those craving some IntelliJ experience, here's plugin for vscode providing you with a subset of Intellij's shortcuts - [IntelliJ Idea Keybindings](https://marketplace.visualstudio.com/items?itemName=k--kato.intellij-idea-keybindings).
