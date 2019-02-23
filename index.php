<?php

	function adminer_object()
	{
		// Required to run any plugin.
		include_once "./plugins/plugin.php";

		// Plugins auto-loader.
		foreach (glob("plugins/*.php") as $filename) {
			include_once "./$filename";
		}

		// Specify enabled plugins here.
		$plugins = [
			// AdminerTheme has to be the last one!
			new AdminerTheme("default-blue"),
			new AdminerDatabaseHide(["mysql", "information_schema", "performance_schema"]),
			new AdminerDumpDate(),
			new AdminerDumpJson(),
			new AdminerDumpXml(),
			new AdminerEditForeign(),
			new AdminerEditTextarea(),
			new AdminerEnumOption(),
			new AdminerJsonColumn(),
			new AdminerSqlLog(),
			new AdminerVersionNoverify(),
			// Color variant can by specified in constructor parameter.
			// new AdminerTheme("default-orange"),
			// new AdminerTheme("default-blue", ["localhost" => "default-orange"]),
			// new AdminerTheme("default-green", ["192.168.0.1" => "default-orange"]),
		];

		return new AdminerPlugin($plugins);
	}

	// Include original Adminer or Adminer Editor.
	include "./adminer.php";
