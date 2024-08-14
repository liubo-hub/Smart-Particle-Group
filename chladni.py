import sys

import numpy as np
import matplotlib.pyplot as plt
import os

def chladni_pattern(x, y, a, b, m, n):
    return a * np.sin(np.pi * n * x) * np.sin(np.pi * m * y) + b * np.sin(np.pi * m * x) * np.sin(np.pi * n * y)

def generate_chladni_pattern(a, b, m, n, resolution=100):
    x = np.linspace(0, 1, resolution)
    y = np.linspace(0, 1, resolution)
    X, Y = np.meshgrid(x, y)
    Z = chladni_pattern(X, Y, a, b, m, n)
    return X, Y, Z

def plot_chladni_pattern(X, Y, Z, save_path=None):
    plt.contourf(X, Y, Z, cmap='viridis')
    plt.colorbar()
    plt.title('Chladni Pattern')
    plt.xlabel('X')
    plt.ylabel('Y')

    if save_path:
        plt.savefig(save_path, format='png')
    else:
        plt.show()

# 设置参数
a = 1
b = 1
m = int(sys.argv[1])
n = int(sys.argv[2])

# 生成和绘制克拉德尼图案
X, Y, Z = generate_chladni_pattern(a, b, m, n)

# 保存图像到文件夹
output_folder = 'images/cbliu_images'
os.makedirs(output_folder, exist_ok=True)
output_path = os.path.join(output_folder, f'chladni.png')
plot_chladni_pattern(X, Y, Z, save_path=output_path)
