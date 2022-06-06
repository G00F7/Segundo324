using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Pregunta3
{
    public partial class Form1 : Form
    {
        Bitmap bmp;
        int pR, pG, pB;
        Bitmap bmpR;
        int p;
        List<Bitmap> imagenes;
        List<Color> colores;

        public Form1()
        {
            InitializeComponent();  
        }

        private void CargarImagen(object sender, EventArgs e)
        {
            openFileDialog1.Filter = "Archivos jpeg|*.jpg|Archivo png|*.png|Archivos GIF|*.gif";
            if(openFileDialog1.ShowDialog() == DialogResult.OK)
            {
                bmp = new Bitmap(openFileDialog1.FileName);
                pictureBox1.Image = bmp;

                imagenes = new List<Bitmap>();
                colores = new List<Color>();
                
                colores.Add(Color.DarkOrange);
                colores.Add(Color.LightBlue);
                colores.Add(Color.Maroon);
                colores.Add(Color.DarkBlue);

                button5.Visible = false;
                button6.Visible = false;
                button7.Visible = false;
                button8.Visible = false;
                button9.Visible = false;
                p = 0;
            }
        }
        private void pictureBox1_MouseClick(object sender, MouseEventArgs e)
        {
            Color c = new Color();
            pR = 0;
            pG = 0;
            pB = 0;
            for (int ki = e.X; ki < e.X + 10; ki++)
                for (int kj = e.Y; kj < e.Y + 10; kj++)
                {
                    c = bmp.GetPixel(ki, kj);
                    pR = pR + c.R;
                    pG = pG + c.G;
                    pB = pB + c.B;
                }
            pR = pR / 100;
            pG = pG / 100;
            pB = pB / 100;
            textBox1.Text = c.R.ToString();
            textBox2.Text = c.G.ToString();
            textBox3.Text = c.B.ToString();

            if (imagenes.Count == 0)
            {
                int mR = 0, mG = 0, mB = 0;
                c = new Color();
                bmpR = new Bitmap(bmp.Width, bmp.Height);
                for (int i = 0; i < bmp.Width - 10; i = i + 10)
                    for (int j = 0; j < bmp.Height - 10; j = j + 10)
                    {
                        mR = 0;
                        mG = 0;
                        mB = 0;
                        for (int ki = i; ki < i + 10; ki++)
                            for (int kj = j; kj < j + 10; kj++)
                            {
                                c = bmp.GetPixel(ki, kj);
                                mR = mR + c.R;
                                mG = mG + c.G;
                                mB = mB + c.B;
                            }
                        mR = mR / 100;
                        mG = mG / 100;
                        mB = mB / 100;
                        c = bmp.GetPixel(i, j);
                        if ((pR - 5 <= mR && mR <= pR + 5) && (pG - 5 <= mG && mG <= pG + 5) && (pB - 5 <= mB && mB <= pB + 5))
                        {
                            for (int ki = i; ki < i + 10; ki++)
                                for (int kj = j; kj < j + 10; kj++)
                                    bmpR.SetPixel(ki, kj, colores[p]);
                        }
                        else
                        {
                            for (int ki = i; ki < i + 10; ki++)
                                for (int kj = j; kj < j + 10; kj++)
                                {
                                    c = bmp.GetPixel(ki, kj);
                                    bmpR.SetPixel(ki, kj, Color.FromArgb(c.R, c.G, c.B));
                                }
                        }
                    }
                pictureBox2.Image = bmpR;
                Bitmap clon = (Bitmap)bmpR.Clone();
                imagenes.Add(bmpR);
                imagenes.Add(clon);
                button9.Visible = true;
            }
            else
            {
                int mR = 0, mG = 0, mB = 0;
                c = new Color();
                bmpR = imagenes[0];
                Bitmap bmpA = new Bitmap(bmp.Width, bmp.Height);
                for (int i = 0; i < bmp.Width - 10; i = i + 10)
                    for (int j = 0; j < bmp.Height - 10; j = j + 10)
                    {
                        mR = 0;
                        mG = 0;
                        mB = 0;
                        for (int ki = i; ki < i + 10; ki++)
                            for (int kj = j; kj < j + 10; kj++)
                            {
                                c = bmp.GetPixel(ki, kj);
                                mR = mR + c.R;
                                mG = mG + c.G;
                                mB = mB + c.B;
                            }
                        mR = mR / 100;
                        mG = mG / 100;
                        mB = mB / 100;
                        c = bmp.GetPixel(i, j);
                        if ((pR - 5 <= mR && mR <= pR + 5) && (pG - 5 <= mG && mG <= pG + 5) && (pB - 5 <= mB && mB <= pB + 5))
                        {
                            for (int ki = i; ki < i + 10; ki++)
                                for (int kj = j; kj < j + 10; kj++)
                                {
                                    bmpR.SetPixel(ki, kj, colores[p]);
                                    bmpA.SetPixel(ki, kj, colores[p]);
                                }
                        }
                        else
                        {
                            for (int ki = i; ki < i + 10; ki++)
                                for (int kj = j; kj < j + 10; kj++)
                                {
                                    c = bmpR.GetPixel(ki, kj);
                                    bmpR.SetPixel(ki, kj, Color.FromArgb(c.R, c.G, c.B));
                                    c = bmp.GetPixel(ki, kj);
                                    bmpA.SetPixel(ki, kj, Color.FromArgb(c.R, c.G, c.B));
                                }
                        }
                    }
                pictureBox2.Image = bmpR;
                imagenes.Add(bmpA);
                imagenes[0] = bmpR;
            }
            p++;

            switch (imagenes.Count)
            {
                case 2: button5.Visible = true; break;
                case 3: button6.Visible = true; break;
                case 4: button7.Visible = true; break;
                case 5: button8.Visible = true; break;
            }
        }

        private void button5_Click(object sender, EventArgs e)
        {
            pictureBox2.Image = imagenes[1];
        }

        private void button6_Click(object sender, EventArgs e)
        {
            pictureBox2.Image = imagenes[2];
        }

        private void button7_Click(object sender, EventArgs e)
        {
            pictureBox2.Image = imagenes[3];
        }

        private void button8_Click(object sender, EventArgs e)
        {
            pictureBox2.Image = imagenes[4];
        }

        private void button9_Click(object sender, EventArgs e)
        {
            pictureBox2.Image = imagenes[0];
        } 
    }
}
