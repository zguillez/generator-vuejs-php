"use strict";
const Generator = require("yeoman-generator");
const chalk = require("chalk");
const yosay = require("yosay");
const fs = require("fs");
const path = require("path");
const { version } = JSON.parse(
  fs.readFileSync(path.resolve(__dirname, "../../") + "/package.json")
);
module.exports = class extends Generator {
  prompting() {
    this.log(yosay("generator-vuejs-php " + chalk.green(`v${version}`)));
  }

  writing() {
    this.fs.copy(
      this.templatePath(`package.json`),
      this.destinationPath("package.json")
    );
    this.fs.copy(
      this.templatePath(`README.md`),
      this.destinationPath("README.md")
    );
    this.fs.copy(
      this.templatePath(`gitignore.txt`),
      this.destinationPath(".gitignore")
    );
    this.fs.copy(
      this.templatePath(`lintstagedrc.txt`),
      this.destinationPath(".lintstagedrc")
    );
    this.fs.copy(this.templatePath(`client`), this.destinationPath("client"));
    this.fs.copy(this.templatePath(`dist`), this.destinationPath("dist"));
    this.fs.copy(this.templatePath(`husky`), this.destinationPath("husky"));
    this.fs.copy(this.templatePath(`server`), this.destinationPath("server"));
  }

  install() {
    this.npmInstall();
    this.log(
      yosay(
        "Installing dependencies. Once the installation is complete, execute\n" +
          chalk.green(`npm run init`)
      )
    );
  }
};
