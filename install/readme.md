## Installing SMP

Before installing, make sure your platform has the [required](/docs/getting-started/requirements) components to run Anchor.

1.	Download the latest version of SMP [here](/download).
2.	Navigate to your downloading file and extract the contents.
3.	Depending on your host there may be a few methods of getting files uploaded.
	The most common is FTP/SFTP. In your favourite client, connect to your webhost
	and upload the files into the `public` folder. **Note:** on different hosts,
	this folder might be called `public_html`, `web`, or `httpdocs`.
4.	Most server should be configured to allow the webserver to read and write to
	your files and folders, but some do not, in this case you will have to change
	the permissions on the `contents` and `smp/config` folder to `0777` for
	the installer to run.
5.	Next you will need to create a database for Anchor to install to, this can
	be called anything you like. On different host this process might vary,
	normally you will have access to some sort of GUI client such as PHPMyAdmin
	or Sequel Pro. You’ll need to ask your webhost if you’re not sure with this.
6.	Navigate your browser to your Anchor installation URL, if you have placed Anchor
	in a sub directory make sure you append the folder name to the URL:

<pre><span class="comment">http://mydomainname.com</span>/smp</pre>

7.  Follow the instructions in the installer.

8.	Once you have completed the install, make sure to delete `install` folder for
    security purposes.
